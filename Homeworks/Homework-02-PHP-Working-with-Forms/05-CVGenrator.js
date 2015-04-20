var idCounterProg = 0,
    idCounterLang = 0;

function addProgLang() {
    var newElement = document.createElement("div");
    newElement.setAttribute("id", "ProgBox" + idCounterProg);
    var levels = ['Beginner', 'Programmer', 'Ninja'];
    newElement.innerHTML =
        '<input type="text" name="progLanguages[]" required/>' +
        '<select name="level[]">' +
        generateOptions(levels) +
        '</select>' +
        '<br/>';
    document.getElementById("parent-prog-lang").appendChild(newElement);
}
function removeProgLang() {
    var childElement = document.getElementById("parent-prog-lang").lastChild;
    if (childElement.id != "ProgBox0") {
        childElement.parentNode.removeChild(childElement);
        idCounterProg--;
    }
}
function incerementCounterProg(){
    idCounterProg++;
}

function addSpeakingLang() {
    var newElement = document.createElement("div");
    newElement.setAttribute("id", "LangBox" + idCounterLang);
    var skills = ['Comprehension', 'Reading', 'Writing'];
    var levels = ['Beginner', 'Intermediate', 'Advanced'];

    newElement.innerHTML = '<input type="text" name="speakingLanguages[]" required/>';
    for(var skill = 0; skill < 3; skill++) {
        newElement.innerHTML +=
            '<select name="' + skills[skill].toLowerCase() + '[]" required>' +
            '<option disabled selected>-' + skills[skill] + '-</option>' +
            generateOptions(levels) + '</select>';
    }
    newElement.innerHTML += '<br/>';
    document.getElementById("speaking-lang-parent").appendChild(newElement);
}
function removeSpeakingLang() {
    var childElement = document.getElementById('speaking-lang-parent').lastChild;
    if(childElement.id != "LangBox0") {
        childElement.parentNode.removeChild(childElement);
        idCounterLang--;
    }
}
function incerementCounterLang(){
    idCounterLang++;
}

function generateOptions(levels) {
    var options = "";
    for(var level = 0; level < 3; level++) {
        options += '<option value="' + levels[level] + '">' + levels[level] + '</option>';
    }
    return options;
}