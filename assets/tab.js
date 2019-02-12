function openModalidade(evt, ModalidadeName) {
    // Declarar todas as variáveis
    var i, tabcontent, tablinks;

    // Obter todos os elementos com class = "tabcontent" e ocultá-los
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Obter todos os elementos com class = "tablinks" e remover a classe "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Mostra a guia atual e adiciona uma classe "ativa" ao botão que abriu a guia
    document.getElementById(ModalidadeName).style.display = "block";
    evt.currentTarget.className += " active";
}