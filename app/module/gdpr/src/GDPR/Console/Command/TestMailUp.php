<?php

namespace GDPR\Console\Command;

use GDPR\Exception\MailUPRecipientException;
use Console\Exception;
use GDPR\Service\MailUP\Lists as MailUPListService;
use GDPR\Service\MailUP\Recipient as MailUPRecipientService;
use Console\Command\Base;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestMailUp extends Base
{
    protected function configure()
    {
        $this->setName('mail:mailup:test')
            ->setDescription('Test MailUP function (to be use only for DEV)');
    }

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 *
	 * @return int|null|void
	 */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

//		$serviceList = new MailUPListService();
//		// Read list
//	    $serviceList->readByOwnerId(2);
//		// Create list
//		$now = new \DateTime('now');
//		$expire = clone $now;
//		$expire->modify('+1 month');
//	    $listTTL = $serviceList->createByOwnerId (
//	    	2,
//		    'Test Automatico ' . $now->format('Y-m-d H:i:s'),
//		    true,
//		    false,
//		    'sirius82@gmail.com',
//		    'sirius82@gmail.com',
//		    'TEST Mattias',
//			'TEST srl',
//			'Mario Rossi',
//		    'Via roma 5',
//		    'Milano',
//		    'IT',
//		    'Ciao, ti sei iscritto a questa lista di test',
//		    'https://test.com',
//		    $expire
//	    );
//	    // Add recipient to list
//	    $service = new MailUPRecipientService();
//	    $recipientTTL = $service->addToListByOwnerId (
//		    2,
//		    $listTTL->getId(),
//		    'test6@test.com',
//		    'Nome',
//		    'Cognome',
//		    [
//		    	'Country' => 'IT'
//		    ],
//		    $expire
//	    );
//	    // Delete recipient form list
////	    $service->deleteByOwnerId(
////		    2,
////		    $recipientTTL
////	    );
//	    // Delete list
//	    $serviceList->deleteByOwnerId(
//		    2,
//		    $listTTL
//	    );



	    $service = new MailUPRecipientService();
	    $now = new \DateTime('now');
	    $now->modify('+1 days');
	    $service->addMultipleRecipientsToListByOwnerId (
	    	2,
		    1,
	        [
	        	[
	        		'Email' => 'test00@test.com',
			        'nome' => 'nome0',
			        'cognome' => 'cognome0',
			        'expireDate' => $now
		        ],
		        [
			        'Email' => 'test01@test.com',
			        'nome' => 'nome0',
			        'cognome' => 'cognom0',
			        'expireDate' => $now
		        ],
		        [
			        'Email' => 'test02@test.com',
			        'nome' => 'nom0',
			        'cognome' => 'cognome0',
		        ],
	        ]
	    );
    }
}