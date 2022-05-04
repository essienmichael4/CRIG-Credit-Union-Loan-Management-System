const loan = document.querySelector(".loan")
const interest = document.querySelector(".interest")
const total = document.querySelector(".total")
const guaranteed1 = document.querySelector(".guaranteed1")
const guaranteed2 = document.querySelector(".guaranteed2")
const guaranteed3 = document.querySelector(".guaranteed3")
const guaranteed4 = document.querySelector(".guaranteed4")

loan.addEventListener("input", ()=>{
    const loanAmount = loan.value
    const amount = loanAmount * 0.20
    const totalLoan = parseFloat(loanAmount) + parseFloat(amount)
    const guaranteed = totalLoan / 4

    interest.value = amount
    total.value = totalLoan
    guaranteed1.value = guaranteed
    guaranteed2.value = guaranteed
    guaranteed3.value = guaranteed
    guaranteed4.value = guaranteed

})