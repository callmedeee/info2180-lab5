document.addEventListener("DOMContentLoaded", loadDOM)
function loadDOM(){ 
    console.log("Website has Loaded!")
    displaySearch()
}

function displaySearch(){
    document.getElementById('lookup').onclick = function() {
        let url = "http://localhost/info2180-lab5/world.php?country=";
        var input = document.getElementById("country").value;
        let query = Sanitizer(input);
            let req = new Request(url+query+"&context=country");

            fetch(req)
            .then(response => response.text())
            .then(data => {
                console.log(data)
                document.getElementById("result").innerHTML = data;
            });

    };
    document.getElementById('lookupc').onclick = function() {
        let url = "http://localhost/info2180-lab5/world.php?country=";
        var input = document.getElementById("country").value;
        let query = Sanitizer(input);
            let req = new Request(url+query+"&context=cities");

            fetch(req)
            .then(response => response.text())
            .then(data => {
                console.log(data)
                document.getElementById("result").innerHTML = data;
            });

    };
}
function Sanitizer(str) {
    str = str.replace(/[^a-z0-9áéíóúñü \.,_-]/gim, " ");
    return str.trim();
}