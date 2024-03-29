console.log(hi);
document.querySelector("#button-menu-open").onclick= function() {
    if(document.querySelector('#modal').classList.contains('hidden')){
        document.querySelector('#modal').classList.add('flex')
        document.querySelector('#modal').classList.remove('hidden')
    } else {
        document.querySelector('#modal').classList.add('hidden')
        document.querySelector('#modal').classList.remove('flex')
    }
}

document.querySelector("#button-menu-close").onclick= function() {
    if(document.querySelector('#modal').classList.contains('hidden')){
        document.querySelector('#modal').classList.add('flex')
        document.querySelector('#modal').classList.remove('hidden')
    } else {
        document.querySelector('#modal').classList.add('hidden')
        document.querySelector('#modal').classList.remove('flex')
    }
}