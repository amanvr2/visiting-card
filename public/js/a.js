const togglePage= function(showClass,hideClass){
    document.querySelector(`.${showClass}`).style.display = 'flex';  
    document.querySelector(`.${hideClass}`).style.display = 'none';
}