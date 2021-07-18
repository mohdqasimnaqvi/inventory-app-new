export class Elem extends HTMLElement {
    attr(attr) {
        return this.getAttribute(attr);
    }
}
export class Elems extends Array {
    on(ev, cb) {
        this.forEach((el, i, arr) => el['on' + ev] = e => cb(e, el, i, arr));
        return this;
    }
    loop(cb) {
        this.forEach(cb);
        return this
    }
    attr(attr) {
        return this.map(el => el.getAttribute(attr));
    }
    setAttr(attr, value) {
        this.forEach(el => el.setAttribute(attr, value));
        return this;
    }
    cond(conditionTypeParam = 'attribute', paramTwo, equals) {
        const conditionType = conditionTypeParam.toLowerCase();
        let cond = () => null;
        if (conditionType === 'attribute') cond = el => el.getAttribute(paramTwo) === equals;
        if (conditionType === 'tag') cond = el => el.tagName.toLowerCase() === paramTwo.toLowerCase();
        return new Elems(...this.filter(cond))
    }

}
const select = (str = 'html') => new Elems(...document.querySelectorAll(str));
export default select;
