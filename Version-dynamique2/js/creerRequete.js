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