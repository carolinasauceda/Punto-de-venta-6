class Dictionary {
    constructor () {
        this.items = {}
    }

    has (key) {
        return this.items.hasOwnProperty(key)
    }

    set (key, value) {
        this.items[key] = value;
    }

    remove (key) {
        if (this.has(key)) {
            delete this.items[key]
            return true
        }

        return false
    }

    get (key) {
        return this.has(key) ? this.items[key] : undefined
    }

    values () {
        const values = []
        for (let key in this.items) {
            if (this.has(key)) {
                values.push(this.items[key])
            }
        }
        return values
    }

    size () {
        return Object.keys(this.items).length
    }

    keys () {
        const keys = []
        for (let key in this.items) {
            keys.push(key)
        }
        return keys

        // La forma corta de hacer esto y abusando de las bondades de javascript
        // es así:
        // return Object.keys(this.items)
    }

    getItems () {
        return this.items
    }

    /*My code*/

    ChildDicHas (parentkey, childkey) {
        return this.items[parentkey].hasOwnProperty(childkey)
    }

    ChildDicSet (parentkey, childkey, value) {
        this.items[parentkey][childkey] = value
    }

    ChildDicRemove (parentkey, childkey) {
        if (this[parentkey].has(childkey)) {
            delete this.items[parentkey][childkey]
            return true
        }

        return false
    }

    ChildDicGet (parentkey, childkey) {
        return this.ChildDicHas(parentkey, childkey) ? this.items[parentkey][childkey] : undefined
    }

    ChildDicValues (parentkey) {
        const values = []
        for (let key in this.items[parentkey]) {
            if (this.ChildDicHas(parentkey, key)) {
                values.push(this.items[parentkey][key])
            }
        }
        return values
    }

    ChildDicSize (parentkey) {
        return Object.keys(this.items[parentkey]).length
    }

    ChildDicKeys (parentkey) {
        const keys = []
        for (let key in this.items[parentkey]) {
            keys.push(key)
        }
        return keys

        // La forma corta de hacer esto y abusando de las bondades de javascript
        // es así:
        // return Object.keys(this.items)
    }

    ChildDicGetItems (parentkey) {
        return this.items[parentkey]
    }
}
