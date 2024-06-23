function isPalimdrome(s) {
    let str = s.replace(/[^a-zA-Z0-9]/g, "").toLowerCase();
    let i = 0;
    let j = str.length - 1;

    while (i <= j) {
        if (str[i] != str[j]) {
            return false;
        }

        i++;
        j--;
    }

    return true;
}

console.log(isPalimdrome("ab"));