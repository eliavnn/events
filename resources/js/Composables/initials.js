export function useInitials(str) {
    let words = str.split(' ');
    words = words.filter(word => word.trim()).map(word => word[0].toUpperCase());

    if(words.length > 3) {
        return words.slice(0, 3).join('');
    }

    return words.join('');
}
