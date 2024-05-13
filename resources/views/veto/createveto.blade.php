
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Inscription vétérinaire</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/InscripVéto.css" />
  </head>
  <body>
  
    <div class="container">
       
      <h1 class="form-title">Inscription vétérinaire </h1>
      <form action="#">
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="fullName">Nom et prénom:</label>
            <input type="text"
                    id="fullName"
                    name="fullName"
                    placeholder="Nom & prénom"/>
          </div>
          <div class="user-input-box">
            <label for="nomcln">Nom du cabinet:</label>
            <input type="text"
                    id="nomcln"
                    name="nomcln"
                    placeholder="clinique"/>
          </div>
          <div class="user-input-box">
            <label for="hor">Horaire du travail</label>
            <input type="text"
                    id="hor"
                    name="hor"
                    placeholder="Enter votre horaire de travail"/>
          </div>
          <div class="user-input-box">
            <label for="frais">Frais de la consultation</label>
            <input type="password"
                    id="frais"
                    name="frais"
                    placeholder="Frais consultation en da"/>
          </div>
          <div class="user-input-box">
            <label for="loc">Localisation du cabinet</label>
            <input type="password"
                    id="loc"
                    name="loc"
                    placeholder="localisation"/>
          </div>
          <div class="user-input-box">
            <label for="confirmPassword">Description</label>
            <input type="password"
                    id="desc"
                    name="desc"
                    placeholder="D'autre information à rajouter"/>
          </div>
        </div>
        <div class="form-group">
          <label for="Description">Description:</label>
          <textarea id="Description" name="Description"></textarea>
        </div>
      <div class="form-group">
          <label for="petPhoto">Photo:</label>
          <input type="file" id="Image" name="Image" accept="image/*">
      </div>
        <div class="form-submit-btn">
          <input type="submit" value="M'inscrire">
        </div>
      </form>
    </div>
  </body>
</html>