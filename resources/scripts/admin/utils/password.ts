const digits = '0123456789';
const upperCaseLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
const lowerCaseLetters = 'abcdefghijklmnopqrstuvwxyz';
const specialChars = '#$-_+';
// Characters excluding special characters
const nonSpecialChars = digits + upperCaseLetters + lowerCaseLetters;
const randomCharFrom = (charSet: string): string => {
    const index = Math.floor(Math.random() * charSet.length);
    return charSet[index];
}

const shuffle = (array: any[]): void => {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
}

export const generatePassword = (passwordLength: number = 12): string => {

    // Ensure the first character is not a special character
    const firstChar = randomCharFrom(nonSpecialChars);

    const passwordChars: string[] = [];

    // Track which character types are included
    const requiredTypes = {
        digit: digits.includes(firstChar),
        upper: upperCaseLetters.includes(firstChar),
        lower: lowerCaseLetters.includes(firstChar),
    };

    // Decide randomly whether to include 1 or 2 special characters
    const specialCharCount = Math.floor(Math.random() * 2) + 1; // 1 or 2
    for (let i = 0; i < specialCharCount; i++) {
        passwordChars.push(randomCharFrom(specialChars));
    }

    // Ensure at least one character from each required set
    if (!requiredTypes.digit) {
        passwordChars.push(randomCharFrom(digits));
    }
    if (!requiredTypes.upper) {
        passwordChars.push(randomCharFrom(upperCaseLetters));
    }
    if (!requiredTypes.lower) {
        passwordChars.push(randomCharFrom(lowerCaseLetters));
    }

    // Fill the rest with random non-special characters
    while (passwordChars.length + 1 < passwordLength) {
        passwordChars.push(randomCharFrom(nonSpecialChars));
    }

    // Shuffle the password characters excluding the first character
    shuffle(passwordChars);

    // Combine the first character with the rest
    return firstChar + passwordChars.join('');
}
