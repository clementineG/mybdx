<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/xhtml" >

<head>
    <meta charset="utf-8">	
    <link href="../css/reset.css" rel="stylesheet" type="text/css">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
	<title>MyBdx - Comptes Twitter de la ville de Bordeaux</title>
    <link rel="icon" type="image/png" href="../images/favicon.png"/>
	<meta name="description" content="Site web permettant la mise en avant des comptes Twitter relatifs à la ville de Bordeaux."/>
	<meta name="keywords" content="comptes twitter bordeaux, mybdx, activités bordeaux, actualité bordeaux, informations bordeaux, infos locales bordeaux, région bordelaise, bdx, sport bordeaux, entreprises bordeaux, évènements bordeaux, sorties bordeaux, économie bordeaux, annuaire comptes twitter bordeaux"/>
	
</head>
<body onLoad="Change('php/index.php')">
    <header> <!--HEADER--> 
		
		<div class="menu-button">
			<div class="logo">
				<a href="index.html" title="Retour à l'accueil"><img src="../images/logo.png" alt="logo mybdx"/></a>
			</div>
			<div class="title">
				<h1><a href="index.html" title="Retour à l'accueil">MyBdx</a></h1>
			</div>
			<div class="connect_suscribe">
				<form method="GET">
					<input type="button" onClick="Connect()" value="Connection"/>
					<input type="button" onClick="Suscribe()" value="Inscription"/> 
				</form>
			</div>
			<div class="submit">
				<form method="GET">
					<input type="button" onClick="ProposerCompte()" value="Soummettre un nouveau compte"/>
				</form>
			</div>
		</div>
		
	</header>
	
	<section> 		
		<div class="main">
			<div class="breadcrumb">
				<a href="index.html"> MyBdx > Accueil > Mon profil</a>
			</div>
			
			<div class="profilUtilisateur">
				<img src="../images/avatar_vide.gif" alt="avatar vide" />
				<p> Pseudo </p>
				<p> Description </p>
				
				
			</div>
			
		</div>
				
    </section>
	
	
	
    <footer> <!--FOOTER-->
			<a href="http://www.iut.u-bordeaux1.fr/info/"><img id="iut" src="../images/logo_info_couleur.png" alt="IUT Informatique Bordeaux 1" title="IUT Bordeaux 1 - Département Informatique"/></a>
			<a href="https://www.facebook.com/Mybdx.fr"><img id="facebook" src="../images/facebook.png" alt="facebook mybdx" title="Retrouvez-nous sur Facebook !"/></a>
			<a href="https://twitter.com/Mybdx33"><img id="twitter" src="../images/twitter.png" alt="twitter mybdx" title="Retrouvez-nous sur Twitter !"/></a>
			<a href="https://plus.google.com/u/0/108047020626214498830"><img id="googleplus" src="../images/googleplus.png" alt="googleplus mybdx" title="Retrouvez-nous sur Google+ !"/></a>
			<div id="legalMentions"><a href="mentions-legales.html">Mentions légales</a></div>
	</footer>	
	
</body>
<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		
		try{
		var pageTracker = _gat._getTracker("UA-44812751-1");
		pageTracker._trackPageview();
		} catch(err) {}
		
		var requete = null;

		function remplacerTexte(el, texte) {
		  if (el != null) {
			effacerTexte(el);
			var nouveauNoeud = document.createTextNode(texte);
			el.appendChild(nouveauNoeud);
		  }
		}

		function create(el, setid, texte) {
			var newdiv = document.createElement('div');
			newdiv.setAttribute('class',setid);
			el.appendChild(newdiv);
			var newtext = document.createTextNode(texte);
			newdiv.appendChild(newtext);
		}

		function effacerTexte(el) {
		  if (el != null) {
			if (el.childNodes) {
			  for (var i = 0; i < el.childNodes.length; i++) {
				var noeudFils = el.childNodes[i];
				el.removeChild(noeudFils);
			  }
			}
		  }
		}

		function getTexte(el) {
		  var texte = "";
		  if (el != null) {
			if (el.childNodes) {
			  for (var i = 0; i < el.childNodes.length; i++) {
				var noeudFils = el.childNodes[i];
				if (noeudFils.nodeValue != null) {
				  texte = texte + noeudFils.nodeValue;
				}
			  }
			}
		  }
		  return texte;
		}

		   function creerRequete() {


			 try {
			   requete = new XMLHttpRequest();
			 } catch (essaimicrosoft) {
			   try {
				 requete = new ActiveXObject("Msxml2.XMLHTTP");
			   } catch (autremicrosoft) {
				 try {
				   requete = new ActiveXObject("Microsoft.XMLHTTP");
				 } catch (echec) {
				   requete = null;
				 }
			   }
			 }

			 if (requete == null)
			   alert("Impossible de créer l'objet requête!");
		   }
		   
		function Change(url){ 
			creerRequete();
			requete.open("GET", url , true );
			requete.onreadystatechange = actualiserPage;
			requete.send(null);
		}

		function actualiserPage() {
			if(requete.readyState == 4) {
				if ( requete.status == 200) {
					var reponse = requete.responseText;
					var contentEL = document.getElementById("content");
					
					effacerTexte(contentEL);
					effacerTexte(contentEL);
					effacerTexte(contentEL);
					effacerTexte(contentEL);
					effacerTexte(contentEL);
					effacerTexte(contentEL);
					
					var i = 0;
					var splitWords = reponse.split("|");
					
					var color;
					var font;
					
					while(splitWords[i+2]!=null){
						var color = document.createElement('div');
						if(splitWords[i+2]=="Entreprise")
							color.setAttribute('class',"colorleftentreprise");
						if(splitWords[i+2]=="Economie")
							color.setAttribute('class',"colorlefteconomie");
						if(splitWords[i+2]=="Sport")
							color.setAttribute('class',"colorleftsport");
						if(splitWords[i+2]=="Sortie")
							color.setAttribute('class',"colorleftsortie");
						if(splitWords[i+2]=="Information")
							color.setAttribute('class',"colorleftinformation");
						contentEL.appendChild(color);
						var font = document.createElement('div');
						font.setAttribute('class',"fontdiv");
						contentEL.appendChild(font);
						create(font,"case",splitWords[i]);
						create(font,"case",splitWords[i+1]);
						create(font,"case",splitWords[i+2]);
						i+=3;
					}
				}
			}
		}
	</script>
</html>
