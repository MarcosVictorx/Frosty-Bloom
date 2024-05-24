
function showModal(url, modalId, amount,price,name,flavor,size,weight,src) {
  fetch(url)
    .then(response => {
      if (!response.ok) {
        throw new Error('Erro na resposta do servidor');
      }
      return response.text();
    })
    .then(data => {
      
   
      document.getElementById('modal-container').innerHTML = data;
      document.getElementById('amount').value = amount;
      document.getElementById('price').value = price;
      document.getElementById('nomeProduct').value = name;
      document.getElementById('flavor').value = flavor;
      document.getElementById('size').innerHTML = size;
      document.getElementById('weight').innerHTML = weight;
      document.getElementById('imgCard').src = src;
      
      // alert("No momento, devido ao alto fluxo de pedidos, estamos trabalhando com 1 pedido por vez !")
      // Inicializa e mostra o modal após carregar o conteúdo
      var myModal = new bootstrap.Modal(document.getElementById(modalId), {});
      myModal.show();
     
    })
    .catch(error =>  console.error(error));
}

function salvarDados() {

    var NameClient = document.getElementById('NameClient').value;
    var Email = document.getElementById('email').value;
    var Telefone = document.getElementById('phoneNumber').value;
    var NameProduct = document.getElementById('nomeProduct').value;
    var Valor = document.getElementById('price').value;
    var Quant = document.getElementById('amount').value;
    var Sabor = document.getElementById('flavor').value;

    if(NameClient == "") {
       alert("Nome nao pode ficar vazio ")
    } else if (Email == "") {
       alert("Email nao pode ficar vazio ")
    }  else {
        var xhr = new XMLHttpRequest();
        
        xhr.open("POST", "../../service/salvar_dados.php", true);

        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
          console.log(xhr)
          if ( xhr.readyState == 4 && xhr.status === 500) {
            alert("Banco de Dados inexistente :( | Click em OK para criar um novo :)");
            executarPHP();
          } else if (xhr.readyState == 4 && xhr.status == 200) {
            alert(xhr.responseText);
            setTimeout( () => {window.location.reload()}, 750)
            }  
        };
            
        xhr.send("&nameClient=" + NameClient + "&phoneNumber=" + Telefone + "&email=" + Email + "&nameProduct=" + NameProduct + "&amount=" + Quant +"&price=" + Valor + "&flavor="+ Sabor);
        }              
 }

 function executarPHP() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "../../service/service.php", true); 
  xhr.send();
  xhr.onload = function () {
      if (xhr.status == 200) {
          alert(xhr.responseText); 
          setTimeout(() => {
            window.location.reload();
          }, 750);
      } else {
          alert('Erro ao executar o PHP');
      }
  };
}