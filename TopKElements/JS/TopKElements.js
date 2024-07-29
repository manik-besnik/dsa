const maxSumOfPElements = (arr,p) => {
    let sum = 0;
    let maxSum;
    let i = 0;
    while ( i < p){
        sum += arr[i];
        i++;
    }

    maxSum = sum;

    i = p;

    while (i < arr.length){
        sum += arr[i] - arr[i-p];
        if (sum > maxSum){
            maxSum = sum;
        }

        i++;
    }

    return maxSum;
}

let arr = [6,89,909,9,-100,89,800]

console.log(maxSumOfPElements(arr,4))