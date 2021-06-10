/*
  Created for Jazzfreunde Ingolstadt e. V. by HoeppyMedien
*/

function restoremail(email)
{
  var neu = email.replace(/ ät /g, "@");
  neu = neu.replace(/ punkt /g, ".");
  return neu;
}

function autoload_jazzlehrer()
{ // Mailadressen automatisch per Hyperlink anzeigen
  var mailhead = document.getElementById("mailhead");
  if (mailhead)
  {
    mailhead.firstChild.data = " ";
  }
  
  var maillines = document.getElementsByTagName("td");
  if (maillines)
  {
    for (var i = 0; i < maillines.length; i++)
    {
      if (maillines[i].className == "email")
      {
        var mail = restoremail(maillines[i].firstChild.data);
        if (mail != maillines[i].firstChild.data)
        { // Da wurde was ersetzt, ist also wirklich eine Mail-Adresse!
          maillines[i].removeChild(maillines[i].firstChild);
          var maillink = document.createElement("a");
          maillink.href = "mailto:" + mail;
          var mailimage = document.createElement("img");
          mailimage.alt = mail;
          mailimage.title = mail;
          mailimage.src = "/gfx/icons/mail.png";
          maillink.appendChild(mailimage);
          maillines[i].appendChild(maillink);
        }
        else
        {
          maillines[i].firstChild.data = " ";
        }
      }
    }
  }
}

function autoload_kontakt()
{ // Mailadressen Anzeigen und das Hakenspiel ausblenden
  var mustcheck = document.getElementById("under18");
  mustcheck.checked = true;
  mustcheck.parentNode.style.display = "none";
  var mustntcheck = document.getElementById("AGB");
  mustntcheck.checked = false;
  mustntcheck.parentNode.style.display = "none";
  
  var mailbutton = document.getElementsByName("showmail");
  for (var i = 0; i < mailbutton.length; i++)
  { // Automatisch draufklicken, wenns der richtige ist...
    if (mailbutton[i].nodeName == "INPUT" && mailbutton[i].type == "submit")
    {
      mailbutton[i].type = "hidden";
      document.kontakt.submit();
    }
  }
}