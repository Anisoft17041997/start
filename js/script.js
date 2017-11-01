//Initialisation des variables
var chatContainer = $(".chat-content-msg");
var username = "";
var chatMsgCount = 0;
var chatMsgAlert = $("#chat-header-msg-alert");


/*Envoie des messages*/
function send_message(message) {
    if(chatContainer.html()!="") {
        chatContainer.append("<br/>");
    }
    
    /*la methode *append* permet d'ajouter un élément*/
    chatContainer.append('<span class="current_message"><span class="chat-bot">chatbot: </span>' + message + "</span>");
    $(".current_message").hide();/*la methode *hide* permet de cacher un élément*/
    $(".current_message").delay(1000).fadeIn();/**delay* permet de patienter pdt 1s, *fadeIn* affiche avec une ptte animation*/
    $(".current_message").removeClass("current_message");/**removeClass* permet d'enlever une classe*/
    
    //new message count
    ++chatMsgCount;
}


/*La magie s'opère ici*/
function ai(message) {
    if(username.length == 0) {
        username = message;
        send_message("Enchanté de faire ta connaissance" + username + ". Quoi de neuf?");
    }
    
    if(message.indexOf("comment vas tu") >= 0) {
        send_message("Super bien et toi?");
    }
    
    if(message.indexOf("quel pays") >= 0) {
        send_message("Je suis de la france");
    }
    
    if(message.indexOf("passion") >= 0) {
        send_message("J'adore l'informatique (^_^)");
    }
    
    if(message.indexOf("racine carre") >= 0) {
        send_message("La racine carre de 25 est 5. Facile!");
    }
    
    if(message.indexOf("ANISOFT") >= 0) {
        send_message("C'est un gar très cool qui fait de bonne choses en informatique.<br/>C'est lui qui m'a créer.");
    }
    
    if(message.indexOf("moi aussi") >= 0) {
        send_message("C'est cool ça !");
    }
    
    if(message.indexOf("age") >= 0) {
        send_message("J'avias 7 ans e 1997. Imagine!");
    }
    
    if(message.indexOf("bye") >=0) {
        send_message("Déja? Ok @+");
    }
    
    if(message.indexOf("heure") >= 0) {
        var date = new Date();
        var h = date.getHours();
        var m = date.getMinutes();
        send_message("Il est actuellement " + (h + 2) + "h" + m);
    }
    
    if(chatMsgCount > 0) {
        chatMsgAlert.fadeIn(1200);
    }
}


$(function() {
    /*Déclaration des variables*/
    var chat_replie_hauteur = 20,
        chat_etendu_hauteur = 400,
        chat_temps_ouverture = 500,
        chat_temps_fermeture = 1000
    ;
    
    
    $(".chat-header_closer").click(function() {
        $(".chat").fadeOut(500);
    });
    
    
    //premier message sent
    send_message("Salut, quel est ton nom?");
    
    
    /*Fonction permettant d'ouvrir ou de fermer le chat-box*/
    $(".chat-header").click(function () {
        var chat = $(".chat"),
        chat_hauteur_courante = chat.height(); 
        
        if(chat_hauteur_courante == chat_replie_hauteur){
            chat.animate(
                { height : chat_etendu_hauteur },
                chat_temps_ouverture
            );
        } else {
            chat.animate(
                { height : chat_replie_hauteur },
                chat_temps_fermeture
            );
        }
        
    });
    
    
    /*Control de l'envoie des messages*/
    $(".chat-content-input").keypress(function (event) {
        chatMsgCount = 0;
        chatMsgAlert.fadeOut();
        
        //Si l'utilisateur tape la touche entrer
        if(event.which == 13) {
            event.preventDefault();
            var myname = '<span class="chat-username">Toi: </span>';
            var userMessage = $(this).val();
            
            //On vide le textarea après envoie du message
            $(this).val();
            
            if(chatContainer.html() != "") {
                chatContainer.append("<br/>");
            }
            
            chatContainer.append(myname + userMessage);
            
            ai(userMessage);
        }
    })
    
});

