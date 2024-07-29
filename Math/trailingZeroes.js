const trailingZeroes = (n) => {
    if(n===0) return 0;
    let fact = BigInt(1);
    for (let i = fact; i <= n; i++) {
        fact*= BigInt(i);
        
    }

  
    fact = fact.toString().split("").reverse();

    let count = 0;

    for (let j = 0; j < fact.length; j++) {
        if (fact[j] != "0") {
            return count;
        }

        count++;
        
    }

    return count
}


console.log(trailingZeroes(30));