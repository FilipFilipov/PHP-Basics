var idCounterProg = 0,
    idCounterLang = 0,
    form;

function addProgLang() {
    idCounterProg++;
    var progName = form.hasOwnProperty("progLanguages") ? form.progLanguages[idCounterProg - 1] || "" : "";
    var newElement = document.createElement("div");
    newElement.setAttribute("id", "ProgBox" + idCounterProg);
    var levels = ['Beginner', 'Programmer', 'Ninja'];
    newElement.innerHTML =
        '<input type="text" name="progLanguages[]" value="' + progName + '" required/>' +
        '<select name="level[]" required>' +
        '<option disabled selected>-Level-</option>' +
        generateOptions(levels, true) +
        '</select>' +
        '<br/>';
    document.getElementById("parent-prog-lang").appendChild(newElement);
}
function removeProgLang() {
    var childElement = document.getElementById("parent-prog-lang").lastChild;
    if (childElement.id != "ProgBox1") {
        childElement.parentNode.removeChild(childElement);
        idCounterProg--;
        updatePHPCounterProg();
    }
}
function updatePHPCounterProg() {
    document.getElementById("counterProg").setAttribute("value", (idCounterProg).toString());
}

function addSpeakingLang() {
    idCounterLang++;
    var langName = form.hasOwnProperty("speakingLanguages") ? form.speakingLanguages[idCounterLang - 1] || "" : "";
    var newElement = document.createElement("div");
    newElement.setAttribute("id", "LangBox" + idCounterLang);
    var skills = ['Comprehension', 'Reading', 'Writing'];
    var levels = ['Beginner', 'Intermediate', 'Advanced'];

    newElement.innerHTML = '<input type="text" name="speakingLanguages[]" value="' + langName + '" required/>';
    for(var skill = 0; skill < 3; skill++) {
        var skillName = skills[skill].toLowerCase();
        newElement.innerHTML +=
            '<select name="' + skillName + '[]" required>' +
            '<option disabled selected>-' + skills[skill] + '-</option>' +
            generateOptions(levels, false, skillName) + '</select>';
    }
    newElement.innerHTML += '<br/>';
    document.getElementById("speaking-lang-parent").appendChild(newElement);
}
function removeSpeakingLang() {
    var childElement = document.getElementById('speaking-lang-parent').lastChild;
    if(childElement.id != "LangBox1") {
        childElement.parentNode.removeChild(childElement);
        idCounterLang--;
        updatePHPCounterLang();
    }
}
function updatePHPCounterLang(){
    document.getElementById("counterLang").setAttribute("value", (idCounterLang).toString());
}

function generateOptions(levels, langIsProg, skillName) {
    var options = "";
    var propArr = langIsProg ? "level" : skillName;
    for(var level = 0; level < 3; level++) {
        var levelName = levels[level];
        options += '<option value="' + levelName + '"';
        if(form.hasOwnProperty(propArr)) {
            if((langIsProg && form[propArr][idCounterProg - 1] === levelName) ||
                (!langIsProg && form[propArr][idCounterLang - 1] === levelName)) {
                options += ' selected';
            }
        }
        options += '>' + levelName + '</option>';
    }
    return options;
}