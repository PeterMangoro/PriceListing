export function pointConverter(object) {
    let t_notes = Object.values(object);
    let arr = [];

    t_notes.push("*".concat(object.a));

    for (let i = 0; i < t_notes.length - 1; i++) {
        arr.push("*".concat(t_notes[i]));
    }

    return arr.toString().replaceAll(",*", "*");
}
