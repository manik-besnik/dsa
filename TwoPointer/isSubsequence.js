const isSubSequence = (s, t) => {
    if (!s) {
        return true;
    }

    let sp = 0;
    let tp = 0;

    while (sp < s.length && tp < t.length) {
        if(s[sp] === t[tp]){
            sp++;
        }

        tp++;
    }

    return sp === s.length
};

console.log(isSubSequence("axc", "ahbgdc"));
