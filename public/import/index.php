<?php

?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
    crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
  <script src="js/function.js"></script>
</head>
<body>
  <div class="container-fluid py-3">
    <div class="container">
      <form>
        <div class="row">
          <div class="form-group col-sm-6 col-md-4">
            <label for="exampleFormControlSelect1">Scegli:</label>
            <select class="form-control" id="selectType">
              <option value="0"></option>
              <option value="1">DATAONE</option>
              <option value="2">MAILONE</option>
              <option value="3">ABS STRUCTURE RESERVATION</option>
              <option value="4">ABS PORTAL RESERVATION</option>
              <option value="5">ABS ENQUIRY</option>
              <option value="6">ABS STORE ONE</option>
            </select>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="container-fluid formOne py-5">
    <div class="container">
      <h3>Compila il seguente form:</h3>
      <hr>
      <form id="formOne">
        <div class="row">
          <div class="form-group col-sm-4">
            <label for="ownerId">Owner Id</label>
            <input name="ownerId" type="text" class="form-control" id="ownerId">
          </div>
          <div class="form-group col-sm-4">
            <label for="termId">Term Id</label>
            <input name="termId" type="text" class="form-control" id="termId">
          </div>
          <div class="form-group col-sm-4">
            <label for="host">Host</label>
            <input name="host" type="text" class="form-control" id="host">
          </div>
          <div class="form-group col-sm-4">
            <label for="dbname">db name</label>
            <input name="dbname" type="text" class="form-control" id="dbname">
          </div>
          <div class="form-group col-sm-4">
            <label for="user">User</label>
            <input name="user" type="text" class="form-control" id="user">
          </div>
          <div class="form-group col-sm-4">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" id="password">
          </div>
          <div class="form-group col-sm-4">
            <label for="domain">Upgrade Domain ID</label>
            <input name="domain" type="text" class="form-control" id="domain">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Invia</button>
      </form>
    </div>
  </div>
  <div class="container-fluid formMailOne py-5">
      <div class="container">
          <h3>Compila il seguente form:</h3>
          <hr>
          <form id="formMailOne">
              <div class="row">
                  <div class="form-group col-sm-4">
                      <label for="ownerId">Owner Id</label>
                      <input name="ownerId" type="text" class="form-control" id="ownerId">
                  </div>
                  <div class="form-group col-sm-4">
                      <label for="termId">Term Id</label>
                      <input name="termId" type="text" class="form-control" id="termId">
                  </div>
                  <div class="form-group col-sm-4">
                      <label for="host">Host</label>
                      <input name="host" type="text" class="form-control" id="host">
                  </div>
                  <div class="form-group col-sm-4">
                      <label for="dbname">db name</label>
                      <input name="dbname" type="text" class="form-control" id="dbname">
                  </div>
                  <div class="form-group col-sm-4">
                      <label for="user">User</label>
                      <input name="user" type="text" class="form-control" id="user">
                  </div>
                  <div class="form-group col-sm-4">
                      <label for="password">Password</label>
                      <input name="password" type="password" class="form-control" id="password">
                  </div>
                  <div class="form-group col-sm-4">
                      <label for="listid">List id</label>
                      <input name="listid" type="text" class="form-control" id="listid">
                  </div>
                  <div class="form-group col-sm-4">
                      <label for="domain">Domain</label>
                      <input name="domain" type="text" class="form-control" id="domain">
                  </div>
                  <div class="form-group col-sm-4">
                      <label for="language">Language</label>
                      <input name="language" type="text" class="form-control" id="language">
                  </div>
              </div>
              <button type="submit" class="btn btn-primary">Invia</button>
          </form>
      </div>
  </div>
  <div class="container-fluid formAbsStructureReservation py-5">
    <div class="container">
      <h3>Compila il seguente form:</h3>
      <hr>
      <form id="formAbsStructureReservation" enctype="multipart/form-data">
        <div class="row">
          <div class="form-group col-sm-4">
            <label for="ownerId">Owner Id</label>
            <input name="ownerId" type="text" class="form-control" id="ownerId">
          </div>
            <div class="form-group col-sm-4">
                <label for="structureId">Structure Id</label>
                <input name="structureId" type="text" class="form-control" id="structureId">
            </div>
          <div class="form-group col-sm-4">
            <label for="termId">Term Id</label>
            <input name="termId" type="text" class="form-control" id="termId">
          </div>
          <div class="form-group col-sm-4">
            <label for="csv">Inserisci il file csv:</label>
            <input name="csv" type="file" class="form-control-file" id="csvreservation">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Invia</button>
      </form>
    </div>
  </div>
  <div class="container-fluid formAbsPortalReservation py-5">
      <div class="container">
          <h3>Compila il seguente form:</h3>
          <hr>
          <form id="formAbsPortalReservation" enctype="multipart/form-data">
              <div class="row">
                  <div class="form-group col-sm-4">
                      <label for="ownerId">Owner Id</label>
                      <input name="ownerId" type="text" class="form-control" id="ownerId">
                  </div>
                  <div class="form-group col-sm-4">
                      <label for="termId">Term Id</label>
                      <input name="termId" type="text" class="form-control" id="termId">
                  </div>
                  <div class="form-group col-sm-4">
                      <label for="csv">Inserisci il file csv:</label>
                      <input name="csv" type="file" class="form-control-file" id="csvportal">
                  </div>
              </div>
              <button type="submit" class="btn btn-primary">Invia</button>
          </form>
      </div>
  </div>
  <div class="container-fluid formAbsEnquiry py-5">
      <div class="container">
          <h3>Compila il seguente form:</h3>
          <hr>
          <form id="formAbsEnquiry" enctype="multipart/form-data">
              <div class="row">
                  <div class="form-group col-sm-4">
                      <label for="ownerId">Owner Id</label>
                      <input name="ownerId" type="text" class="form-control" id="ownerId">
                  </div>
                  <div class="form-group col-sm-4">
                      <label for="termId">Term Id</label>
                      <input name="termId" type="text" class="form-control" id="termId">
                  </div>
                  <div class="form-group col-sm-4">
                      <label for="enquiryUrl">Enquiry URL</label>
                      <input name="enquiryUrl" type="text" class="form-control" id="enquiryUrl">
                  </div>
                  <div class="form-group col-sm-4">
                      <label for="csv">Inserisci il file csv:</label>
                      <input name="csv" type="file" class="form-control-file" id="csvenquiry">
                  </div>
              </div>
              <button type="submit" class="btn btn-primary">Invia</button>
          </form>
      </div>
  </div>
  <div class="container-fluid formAbsStoreONE py-5">
      <div class="container">
          <h3>Compila il seguente form:</h3>
          <hr>
          <form id="formAbsStoreONE" enctype="multipart/form-data">
              <div class="row">
                  <div class="form-group col-sm-4">
                      <label for="ownerId">Owner Id</label>
                      <input name="ownerId" type="text" class="form-control" id="ownerId">
                  </div>
                  <div class="form-group col-sm-4">
                      <label for="termId">Term Id</label>
                      <input name="termId" type="text" class="form-control" id="termId">
                  </div>
                  <div class="form-group col-sm-4">
                      <label for="storeONERegistrationUrl">StoreONE registration URL</label>
                      <input name="storeONERegistrationUrl" type="text" class="form-control" id="storeONERegistrationUrl">
                  </div>
                  <div class="form-group col-sm-4">
                      <label for="csv">Inserisci il file csv:</label>
                      <input name="csv" type="file" class="form-control-file" id="csvstoreone">
                  </div>
              </div>
              <button type="submit" class="btn btn-primary">Invia</button>
          </form>
      </div>
  </div>
</body>
</html>