export function stringToArray(string,splitter) {
    //.split to convert string to array
    //.filter(Boolean) to remove empty sets

    return string.split(splitter).filter(Boolean);
}
