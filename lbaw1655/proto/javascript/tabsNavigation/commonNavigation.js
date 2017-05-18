function prepareSidebar(elements) {
    for (var i in elements)
        elements[i].onclick = function () {
            if(this.innerHTML){                     //checks for "undefined"
                removeAllActive(elements);          // removes all "active" class from all elements of sidebar
                var x = $(this).parent().parent().parent();
                addAllHidden($('.'+x[0].classList.toString()+':not(:first-child)'));      //add "hidden" to all of the content except the first one.
                removeAllHidden(document.getElementsByClassName(this.className.trim()));    //removes "hidden" from the element pressed
                this.classList.add("active");       //adds "active" to the one element pressed
            }
        }
}

function removeAllHidden(elements){
    for(var j in elements){
        if(elements[j].innerHTML)
            elements[j].classList.remove("hidden");
    }
}

function addAllHidden(elements) {
    for(var j in elements){
        if(elements[j].innerHTML)
            elements[j].classList.add("hidden");
    }
}

function prepareNavigation(elements){
   for (var i in elements)
        elements[i].onclick = function () {
            if(this.innerHTML){
                removeAllActive(elements);
                addAllHidden($(".row").children());
                prepareTab(this.id);
                this.classList.add("active");
            }
        }
}

function removeAllActive(navigationElements) {
    for (var j in navigationElements) {
        if (hasClass(navigationElements[j], "active"))
            navigationElements[j].classList.remove("active");
    }
}

function hasClass(element, cls) {
    return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
}