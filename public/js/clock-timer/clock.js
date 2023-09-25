let hora = document.getElementById("hora")
let minutos = document.getElementById("minutos")
let segundos = document.getElementById("segundos")

        setInterval(() => {
            let currentTime = new Date();

            if(minutos<=9)
                minutos="0"+minutos

            hora.innerHTML = (currentTime.getHours()<=9?"0":"") + currentTime.getHours();
            minutos.innerHTML = (currentTime.getMinutes()<=9?"0":"") + currentTime.getMinutes();
            segundos.innerHTML = (currentTime.getSeconds()<=9?"0":"") + currentTime.getSeconds();
        }, 1000);

         var dataAtual = new Date();

  var dia = dataAtual.getDate();
  var mes = dataAtual.getMonth() + 1;
  var ano = dataAtual.getFullYear();

  var dataFormatada = dia + '/' + mes + '/' + ano ;
  document.getElementById('data-atual').textContent = dataFormatada;

