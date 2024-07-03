const isPalindromeNumber = (x) => {

    const number = x+"";

    let start = 0;
    let end = number.length - 1;

    while (start <= end) {
        if (number[start] !== number[end]) {
            return false
        }
        start++;
        end--;

    }
    return true;

}

console.log(isPalindromeNumber(122));