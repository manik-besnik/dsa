const maxArea = (height) => {
    let i = 0;
    let j = height.length - 1;
    let max = Number.MIN_SAFE_INTEGER;
    while (i < j) {
        const area = Math.min(height[i], height[j]) * (j - i);

        max = Math.max(max, area);
        if (height[i] > height[j]) {
            j--;
        } else {
            i++;
        }
    }
    return max;
};
console.log(maxArea([1,8,6,2,5,4,8,3,7]));