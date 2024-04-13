
const Teste0 = () => {
    alert("Teste Conection 0")
}
const Teste1 = () => {
    alert("Teste Conection 1" )
}
const Teste2 = () => {
    alert("Teste Conection 2")
}

const Result = (x,y) => {
    const calcular = x + y
    return (
        alert(`Valor da soma de ${x} com o valor ${y}, resulta em => ${calcular}`)
    )
}

const colors = ['blue','red','green']

const randomElement = colors[Math.floor(Math.random() * colors.length)];

let cont = 0

const mudarCor = () => {
    const btn = document.getElementById("changeColor");
    btn.addEventListener("click",()=>{
        cont++
        console.log("Numero de Click",cont)
    })
    
    console.log("click");
    const element = document.getElementById("boxIten");
    let element1 = document.getElementById("title");
    element.style.backgroundColor = randomElement;
    element1.innerHTML = "Nova cor";
 
   
}