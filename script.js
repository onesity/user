window.addEventListener('load', () => {
    const form = document.getElementById('form');
    const submit = document.getElementById('submit');
    const username = document.getElementById('username');
    const email = document.getElementById('email');
    const age = document.getElementById('age');
    const phone = document.getElementById('phone');
    const password = document.getElementById('password');
    submit.addEventListener('click', () => {
        $.post('http://localhost/users/index.php',{
            username:username,
            email:email,
            age:age,
            phone:phone,
            password:password
        },function(res){
            console.log(res);
        })
    })
})