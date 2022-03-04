let akashBtn = document.querySelector('button') ;
akashBtn.addEventListener('click',inputMsg) ;

function inputMsg(){
    let name = prompt('Enter Your Name ') ;
    akashBtn.textContent = 'Hello : ' + name ;
}