import select, {Elem} from './elems';
const url = 'http://localhost:8000/';
export async function get(uri) {
    const res = await fetch(url + uri);
    const data = await res.json();
    return data;
}
export async function makeResForPostRequest(uri, data) {
    let res;
    if (data === null) {
        res = await fetch(url + uri, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
         });
    }
    else {
        res = await fetch(url + uri, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
         });
    }
    return res;
}
export async function put(uri, data) {
    const res = await fetch(url + uri, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
    });
    const sendData = await res.json();
    return sendData;
}
export async function post(uri, data = null) {
    const res = await makeResForPostRequest(uri, data);
    const sendData = await res.json();
    return sendData;
}
export async function Delete(uri) {
    const res = await fetch(url + uri, { method: 'DELETE'});
    return res;
}
/**
 *
 * @param {method: string, uri: string, data: Object} obj
 * @return data
 */
export default async function ajax({ method = 'GET', uri = '/products/', data = null } = {}) {
    let sendData;
    if (method === 'GET') {
        sendData = await get(uri);
    }
    else if (method === 'POST') {
        sendData = await post(uri, data);
    }
    else if (method === 'PUT') {
        sendData = await put(uri, data);
    }
    else if (method === 'DELETE') {
        sendData = await Delete(uri);
    }
    return sendData;
}
export async function ajaxApi() {
    select('[data-ajax]').loop(elem => {
        const ElemObj = new Elem(...elem);
        const method = ElemObj.attr('data-ajax').toUpperCase();
        const uri = ElemObj.attr('data-ajax-uri');
        const data = ElemObj.attr('data-ajax-data');
        let data = null;
        if (method === 'DELETE') {
            elem.remove();
            data = await Delete(uri);
        };
        if (method === 'GET') data = await get(uri);
        if (method === 'POST') data = await post(uri, data);
        if (method === 'PUT') data = await put(uri, data);
        return data;
    })
}
