function mutateFormState(formState){
    getInputArray().map(
        function(element){
            formState[element.name].isValid=Iodine.is(element.value,eval(element.dataset.rules));
            formState[element.name].hasText=!!element.value;
        });
}
function getInitFormState(){
     let result ={};
    getInputArray().map(
         (element)=>{
            result[element.name]={};
             result[element.name].isValid=Iodine.is(element.value,eval(element.dataset.rules));
             result[element.name].hasValue=!!element.value;
             result[element.name].isBlurred=false;
         });
     return result;
}
function blur(formState,elementName){
    formState[elementName].isBlurred=true;
}

function showsInvalid(formState,elementName){
    let inputState = formState[elementName];
    return (inputState.isValid!==true && (inputState.isBlurred || inputState.hasValue));
}
function getInputArray(){
    return [...document.querySelectorAll('input:not([type=hidden]):not([type=submit])')]
 };

Iodine.addRule('matchingPassword', (value) =>value === document.getElementById('password').value);

function getData(){
    return {
        formState:getInitFormState(),
        serverSideFormErrors:eval(document.getElementById('register-form').dataset.serverErrors)};
}