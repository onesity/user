window.addEventListener('load', () => {
    const form = document.getElementById('form');
    const submit = document.querySelector('#submit');
    const username = document.getElementById('username');
    const email = document.getElementById('email');
    const age = document.getElementById('age');
    const phone = document.getElementById('phone');
    const password = document.getElementById('password');
    // submit.addEventListener('click', () => {
    //     console.log("fsdf")
    //     console.log(username.value)
    //     $.post('http://localhost/users/index.php',{
    //         username:username.value,
    //         email:email.value,
    //         age:age.value,
    //         phone:phone.value,
    //         password:password.value
    //     },function(res){
    //         console.log(res);
    //     })
    // })
})



// fetch("http://localhost/users/list.php")
// .then(function(res){
//     return res.json();
// }).then(function(r){

// })

window.addEventListener('load', function (e) {
    e.preventDefault();
    const search = document.getElementById("search");
    const user_div = document.querySelector(".user-div");

    if (search.value == '') {
        $.get("ajax.php", function (res) {
            printUserCard(res)
        })

    }
    search.addEventListener('keyup', function (e) {

        $.post("ajax.php", {
            key: search.value
        },
            function (res) {
                user_div.innerHTML = '';
                if (res.total_records != 0) {
                    printUserCard(res)

                } else {
                    noDataFound()
                }
                if (res.status == false) {
                    user_div.innerHTML = '';
                    $.get("ajax.php", function (res) {
                        printUserCard(res)
                    })
                }
            }
        )
    })

})

function printUserCard(res) {
    const user_div = document.querySelector(".user-div");
    let total = document.createElement("h3");
    total.innerHTML = 'Total Records Found : '+res.total_records;
    total.setAttribute('id','total');
    user_div.appendChild(total);
    res.data.forEach((e) => {
        let card = document.createElement("div");
        let image = document.createElement("img");
        let username = document.createElement("h3");
        let email = document.createElement("h3");
        let age = document.createElement("h3");
        let phone = document.createElement("h3");
        
        card.setAttribute("id", 'card');
        image.setAttribute("id", 'image');
        username.setAttribute("id", 'username');
        email.setAttribute("id", 'email');
        age.setAttribute("id", 'age');
        phone.setAttribute("id", 'phone');

        image.setAttribute("src",'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0rz7SHvHoyn3LwaQ6Zc8LkQEmi-ClP8mvZg&s');
        username.innerHTML = e.username;
        age.innerHTML = e.age;
        email.innerHTML = e.email;
        phone.innerHTML = e.phone;

        card.appendChild(image);
        card.appendChild(username);
        card.appendChild(age);
        card.appendChild(phone);
        card.appendChild(email);
        user_div.appendChild(card);
    })
}


function noDataFound() {
    const user_div = document.querySelector(".user-div");
    let empty = document.createElement('h1');
    empty.innerHTML = 'No data found';
    empty.setAttribute('id', 'no_data');
    user_div.appendChild(empty);
}
