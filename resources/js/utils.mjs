
function dotGetBefore(object, str) {
    const keys = str.split('.');
    let currentObj = object;
    let lastKey = null;
    let lastObject = object;
    let key;
    for (key of keys) {
        if (currentObj === undefined || currentObj === null) {
            return [lastKey, lastObject, false];
        }
        lastObject = currentObj;
        currentObj = currentObj[key];
        lastKey = key;
    }
    try {
        return [key, lastObject, true];
    } catch(e) {
        return [key, lastObject, false];
    }
}

export function dotg(object, str, def) {
    function throwOrRet(key) {
        if (def === undefined) {
            throw new Error(`Key not found ${key}`);
        }
        return def;
    }
    const [key, o, success] = dotGetBefore(object, str);
    if (!success || o[key] === undefined) {
        return throwOrRet(key);
    }
    return o[key];
}

export function dots(object, str, val) {
    function throwOrRet(key) {
        if (def === undefined) {
            throw new Error(`Key not found ${key}`);
        }
    }
    const [key, o, success] = dotGetBefore(object, str);
    if (!success) {
        throwOrRet(key);
    }
    o[key] = val;
}

export function dot(object, str, val, def=undefined) {
    if (val === undefined) {
        return dotg(object, str, def);
    } else {
        return dots(object, str, val);
    }
}

const Utils = {
    dot, dots, dotg
};

export default Utils;

window.U = Utils;
