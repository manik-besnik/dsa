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

// console.log(isPalimdrome("ab"));

const removeEle = (arr, num) => {
    let newArr = [];
    for (let i = 0; i < arr.length; i++) {
        if (arr[i] != num) {
            newArr.push(arr[i]);
        }
    }

    console.log(newArr.length);
};

// removeEle([3, 2, 2, 3], 2);

const twoSum = (nums, target) => {
    let mp = new Map();

    for (let i = 0; i < nums.length; i++) {
        let diff = target - nums[i];

        if (mp.has(diff)) {
            console.log(mp.has(diff));
            console.log(diff);
            console.log([i, mp.get(diff)]);
        }
        console.log(mp.set(nums[i], i));
        mp.set(nums[i], i);
    }
};

twoSum([5, 75, 25], 100);
