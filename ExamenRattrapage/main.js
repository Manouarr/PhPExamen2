const content = document.querySelector(".content");
const form = document.querySelector("form");

form.addEventListener("submit", function(e) {
    e.preventDefault();
    create({nom: this.nom.value, adresse: this.adresse.value, ville: this.ville.value});
    form.reset();
})

function displayAll() {
    fetch("http://localhost/HB/ExamenRattrapage/?type=cinema&action=index")
        .then((res) => res.json())
        .then((cinemas) => {
            content.innerHTML = "";
            cinemas.forEach((cinema) => {
                console.log(cinema);
                content.innerHTML += templateCinema(cinema);
                content.querySelector(".delBtn").addEventListener("click", function() {
                    suppr({id: this.id})
                });
            });
        })
}



const create = (body) => {
    fetch("http://localhost/HB/ExamenRattrapage/?type=cinema&action=new", {
        method:"POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(body)})
        .then((res)=>res.json()).then(data=>{
        console.log(data);
        displayAll();
    });
};


const suppr = (id) => {
    fetch("http://localhost/HB/ExamenRattrapage/?type=cinema&action=del", {
        method: "DELETE",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(id),
    })
        .then((res)=>res.json())
        .then((data)=> {
            console.log(data)
            displayAll();
        })
}

const templateCinema = (cinema) => {
    template = `<div class="mt-5 me-5 p-2 card">
  <div>
    <button id="${cinema.id}" class="btn btn-danger delBtn">X</button>
  </div>
    <h3>${cinema.nom}</h3>
    <p>${cinema.adresse}, ${cinema.ville}</p> 
    </div>`;
    return template;
};


displayAll();

















