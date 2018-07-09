<?php

/**
 * A simple tool usefoul in order to manager the ABS language phrases
 *
 * @author Mattias Costantini <mattias.costantini@mm-one.com>
 *
 * @version 0.2.0 22/06/2017
 * - added setUntranslatedPhrases()
 * - added convertFromPoToMo()
 * @version 0.1.0 13/04/2017
 * - first version
 */

namespace Abs\Lang;

ini_set('DISPLAY_ERRORS', 1);

if(!defined('ABS_LANG_TOOL_AP'))
    define('ABS_LANG_TOOL_AP', __DIR__);

ini_set('memory_limit', '1024M');

/**
 * Class Tool
 *
 * @package Abs\Lang
 */
class Tool
{
    /**
     * RegExp used to extract a phrase
     */
    const getTextRegExpr = "/(?<=\").*(?=\")/";

    /**
     * Get all untranslated phrases
     *
     * @param string $lang
     * @throws \Exception
     */
    public function getUntranslatedPhrases(
        $lang = null
    ) {
        //$lang = 'de_DE'; //@todo test !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

        // Generate dictionary
        if(empty($lang))
        {
            $directoryIterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator(
                    realpath(ABS_LANG_TOOL_AP . '/../'),
                    \RecursiveDirectoryIterator::SKIP_DOTS
                ),
                \RecursiveIteratorIterator::SELF_FIRST,
                \RecursiveIteratorIterator::CATCH_GET_CHILD
            );
            $languages = array();
            foreach($directoryIterator as $dir => $entity)
            {
                if($entity->isDir())
                {
                    if(realpath($entity->getPathname() . '/LC_MESSAGES') !== false)
                        $languages[] = $entity->getFilename();
                }
            }
        } else if (!is_array($lang)) {
            $languages = array(
                $lang
            );
        } else
            $languages = $lang;
        $dictionary = $this->generateDictionary(
            realpath(ABS_LANG_TOOL_AP . '/../../../')
        );
        $itDictionary = $this->extractDataFromPOFile(
            realpath(ABS_LANG_TOOL_AP . '/../it_IT/LC_MESSAGES/messages.po')
        );

        $dictionary = array_flip($dictionary);
        /*foreach($dictionary as $k => $v)
        {
            if(isset($itDictionary[$k]))
                unset($itDictionary[$k]);
            $dictionary[$k] = '';
        }*/
        $dictionary = array_merge($dictionary, $itDictionary);
        unset($itDictionary);

        // Compare all languages
        foreach($languages as $language)
        {
            $localMissingDictionary = $dictionary;

            // Extract local language dictionary
            $langPath = realpath(ABS_LANG_TOOL_AP . '/../' . $language . '/LC_MESSAGES/messages.po');
            if(empty($langPath))
                throw new \Exception("The language folder $language not exist. Have you uploaded the language file with correct name?");
            $poFile = new \SplFileInfo($langPath);
            if(!$poFile->isReadable())
                throw new \Exception("The .po file $langPath is not readable.");
            $poDictionary = $this->extractDataFromPOFile($poFile->getRealPath());

            // Search if the dictionary phrase exist
            foreach($localMissingDictionary as $testPhrase => $testPhraseValue)
            {
                $localMissingDictionary[$testPhrase] = '';
            }
            foreach($localMissingDictionary as $testPhrase => $testPhraseValue){
                $testPhraseValue = str_replace('\"', '"', $testPhraseValue);
                $testPhraseValue = str_replace("\'", "'", $testPhraseValue);

                // try to search the label
                $poPhraseFound = false;
                foreach($poDictionary as $poPhrase => $poPhraseValue){
                    if($poPhrase == $testPhrase)
                    {
                        $poPhraseFound = true;
                        break;
                    }
                }

                // Try to search an alternative translated string based on a similar translated label
                foreach($poDictionary as $poPhrase => $poPhraseValue){
                    //strpos($poPhrase, '\"');
                    $poPhrase = str_replace('\"', '"', $poPhrase);
                    $poPhrase = str_replace("\'", "'", $poPhrase);
                    if( $poPhrase != $testPhrase &&
                        strtolower($poPhrase) == strtolower($testPhrase) &&
                        empty($localMissingDictionary[$testPhrase])
                    ) {
                        $localMissingDictionary[$testPhrase] = $poPhraseValue;
                        break;
                    }
                }

                if($poPhraseFound)
                    unset($localMissingDictionary[$testPhrase]);
            }

            // Make the missing translation file
            $outputFilePath = ABS_LANG_TOOL_AP . '/tmp/output/Missing_' . $language . '.xls';
            $outputFile = new \SplFileInfo($outputFilePath);
            if(!is_writable($outputFile->getPathInfo()->getRealPath()))
                throw new \Exception("The output file $outputFilePath is not writable. Check the folder permission.");
            $handle = fopen($outputFilePath, 'w');
            foreach($localMissingDictionary as $k => $v)
            {
                fputcsv($handle, array($k, $v));
            }
            fclose($handle);
        }
    }

    /**
     * Generate dictionary from absolute path
     *
     * @param string $path
     * @return array
     */
    public function generateDictionary(
        $path
    ) {
        $dictionary = array();

        // Application language
        $directoryIterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(
                $path,
                \RecursiveDirectoryIterator::SKIP_DOTS
            ),
            \RecursiveIteratorIterator::SELF_FIRST,
            \RecursiveIteratorIterator::CATCH_GET_CHILD
        );
        foreach($directoryIterator as $dir => $entity)
        {
            if( !$entity->isDir() &&
                strpos($entity->getFilename(), ".php") !== false
            ) {
                $file = file_get_contents($entity->getPathname());

                $phrases = array();
                $tmpResults = array();
                preg_match_all('/(?<=__\(")([^"])+(?="\))/', $file, $tmpResults);
                $phrases = array_merge($phrases, $tmpResults[0]);
                $tmpResults = array();
                preg_match_all('/(?<=__\(\s")([^"])+(?="\s\))/', $file, $tmpResults);
                $phrases = array_merge($phrases, $tmpResults[0]);
                $tmpResults = array();
                preg_match_all('/(?<=__\(\')([^\'])+(?=\'\))/', $file, $tmpResults);
                $phrases = array_merge($phrases, $tmpResults[0]);
                $tmpResults = array();
                preg_match_all('/(?<=__\(\s\')([^\'])+(?=\'\s\))/', $file, $tmpResults);
                $phrases = array_merge($phrases, $tmpResults[0]);

                foreach($phrases as $phrase){
                    if( $phrase !== '' &&
                        array_search($phrase, $dictionary) === false)
                    {
                        array_push($dictionary, $phrase);
                    }
                }

                unset($phrases, $phrase);
            }
        }

        return $dictionary;
    }

    /**
     * Extract data from .po file
     *
     * @param $filePath
     * @return array
     */
    protected function extractDataFromPOFile(
        $filePath
    ) {
        $dictionary = array();
        $msgIdFound = false;
        $msgStrFound = false;
        $endFileReached = false;

        if (!empty($filePath)) {
            $handle = fopen($filePath, "r");
            if ($handle) {
                while (!$endFileReached) {

                    if(!$msgIdFound)
                        $line = fgets($handle);
                    if($line === false)
                        $endFileReached = true;
                    if($endFileReached)
                        break;

                    // Find msgid
                    $tmpMatch = array();
                    preg_match(self::getTextRegExpr, $line, $tmpMatch);
                    $msgId = '';
                    if( strpos($line, 'msgid') === 0 &&
                        count($tmpMatch) > 0
                    ) {
                        $msgIdFound = true;
                        $msgId = $tmpMatch[0];
                    }
                    unset($tmpMatch);
                    if(empty($msgId))
                    {

                        // Search multiline msgid
                        $msgStrFound = false;
                        while(!$msgStrFound)
                        {
                            if (($line = fgets($handle)) !== false) {
                                if (strpos($line, 'msgstr') === 0)
                                {
                                    $msgStrFound = !$msgStrFound;
                                    break;
                                }
                                $tmpMatch = array();
                                preg_match(self::getTextRegExpr, $line, $tmpMatch);
                                if (count($tmpMatch) > 0)
                                    $msgId .= $tmpMatch[0];
                                unset($tmpMatch);
                            }
                        }
                    }

                    // Find msgstr
                    if(!$msgStrFound)
                        $line = fgets($handle);
                    else
                        $msgStrFound = !$msgStrFound;
                    if (strpos($line, 'msgstr') === 0) {
                        $tmpMatch = array();
                        preg_match(self::getTextRegExpr, $line, $tmpMatch);
                        $msgStr = '';
                        if (count($tmpMatch) > 0)
                            $msgStr = $tmpMatch[0];
                        unset($tmpMatch);

                        // Search multiline msgstr
                        $msgIdFound = false;
                        while(!$msgIdFound || !$endFileReached)
                        {
                            if (($line = fgets($handle)) !== false) {
                                if (strpos($line, 'msgid') === 0)
                                {
                                    $msgIdFound = !$msgIdFound;
                                    break;
                                }
                                $tmpMatch = array();
                                preg_match(self::getTextRegExpr, $line, $tmpMatch);
                                if (count($tmpMatch) > 0)
                                    $msgStr .= $tmpMatch[0];
                                unset($tmpMatch);
                            } else {
                                $endFileReached = true;
                                break;
                            }
                        }
                        $dictionary[$msgId] = $msgStr;
                    }
                }
                fclose($handle);
            }
        }

        return $dictionary;
    }

    /**
     * Set untranslated phrases into selected .po file
     *
     * @throws \Exception
     */
    public function setUntranslatedPhrases(
    ) {
        $filesIterator = new \FilesystemIterator(
            realpath(ABS_LANG_TOOL_AP . '/tmp/input'),
            \RecursiveDirectoryIterator::SKIP_DOTS
        );
        foreach($filesIterator as $fileInfo)
        {
            /* @var SplFileInfo $fileInfo */
            $language = substr($fileInfo->getRealPath(), -9, 5);
            $language = strtolower(substr($language, 0, 2)) . '_' . strtoupper(substr($language, 3, 2));
            $this->setUntranslatedPhrasesByLang(
                $language,
                $fileInfo->getRealPath()
            );
        }
    }

    /**
     * Set untranslated phrases into selected .po file
     *
     * @param string $language
     * @param string $filePath
     * @throws \Exception
     */
    public function setUntranslatedPhrasesByLang(
        $language = null,
        $filePath = null
    ) {
        if(empty($language))
            throw new \Exception('The language cannot be empty');

        $fileInfo = new \SplFileInfo($filePath);
        if(substr($fileInfo->getRealPath(), -4) != '.csv')
            throw new \Exception("The translated file: {$fileInfo->getRealPath()} is not a CSV file.");
        if(!$fileInfo->isReadable())
            throw new \Exception("The translated file: {$fileInfo->getRealPath()} is not readable.");

        // Extract the language
        $language = substr($fileInfo->getRealPath(), -9, 5);
        $language = strtolower(substr($language, 0, 2)) . '_' . strtoupper(substr($language, 3, 2));
        $langPath = realpath(ABS_LANG_TOOL_AP . '/../' . $language . '/LC_MESSAGES/messages.po');
        if(empty($langPath))
            throw new \Exception("The language folder $language not exist. Have you uploaded the language file with correct name?");
        $poFile = new \SplFileInfo($langPath);
        if(!$poFile->isWritable())
            throw new \Exception("The .po file $langPath is not writable.");

        // Read existent dictionary
        $dictionary =  $this->extractDataFromPOFile($langPath);

        // Read untranslated phrases CSV file
        $handle = fopen($fileInfo->getRealPath(), "r");
        if ($handle) {
            $addedPhrasesCounter = 0;
            while (($phrase = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if(count($phrase) >= 2)
                {
                    $msgId = str_replace('"', '\"', $phrase[0]);
                    $msgId = str_replace("\'", "'", $msgId);
                    if(empty($msgId))
                        continue;
                    $msgStr = trim(str_replace('"', '\"', $phrase[1]));
                    $msgStr = trim(str_replace("\'", "'", $msgStr));
                    if(!isset($dictionary[$msgId]))
                    {

                        // Update .po file
                        file_put_contents(
                            $langPath,
                            "\n\nmsgid \"$msgId\"\nmsgstr \"$msgStr\"",
                            FILE_APPEND
                        );
                        ++$addedPhrasesCounter;

                        // Update dictionary
                        $dictionary[$msgId] = $msgStr;
                    }
                }
            }
            fclose($handle);
            echo "\nNew $addedPhrasesCounter phrases was added for language $language";
        }
    }

    /**
     * Convert from .po files to .mo files
     *
     * @throws \Exception
     */
    public function convertFromPoToMo()
    {

        // Check if gettext package was installed
        $output = array();
        $returnVar = null;
        exec('msgfmt &> /dev/null', $output, $returnVar);
        if($returnVar !== 1)
            throw new \Exception('You must install the command msgfmt first. Use `yum install gettext` or `dnf install gettext`');

        $search = function($searchPath) use (&$search) {
            foreach (new \DirectoryIterator($searchPath) as $fileInfo) {
                /* @var SplFileInfo $fileInfo */
                if ($fileInfo->isDot())
                    continue;
                if($fileInfo->isDir())
                {
                    $k = $fileInfo->getRealPath();
                    $search($fileInfo->getRealPath());
                } else {
                    $destinationPath = substr($fileInfo->getRealPath(), 0, -2) . 'mo';
                    if (substr($fileInfo->getRealPath(), -2) == 'po') {
                        exec("msgfmt {$fileInfo->getRealPath()} -o $destinationPath");
                        echo("\nThe file {$fileInfo->getRealPath()} has been translated.");
                    }
                }
            }
        };
        $search(realpath(ABS_LANG_TOOL_AP . '/../'));
    }
}
