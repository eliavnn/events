import { reactive } from 'vue';

class BlockInstance {

    constructor(schema)  {
        console.log(schema)
        this.type = schema.type
        this.label = schema.label
        this.fields = this.initilizeFields(schema.fields)
        this.id = crypto.randomUUID()
    }

    initilizeFields(schemaFields) {
        const fields = {}
        for (const [key, field] of Object.entries(schemaFields)) {
            fields[key] = {
                ...field,
                value: field.value
            }
        }
        return fields
    }

    updateField(key, value) {
        this.fields[key].value = value
    }

    toJSON() {
        return {
            type: this.type,
            label: this.label,
            fields: Object.entries(this.fields).map(([key, field]) => {
                return {
                    ...field,
                    value: field.value
                }
            })
        }
    }

}


export function useBlockManager() {
    const blockInstances = reactive([])

    const addBlock = (blockSchema) => {
        const instance = new BlockInstance(blockSchema)
        console.log(instance)
        blockInstances.push(instance)
        return instance.id
    }

    const updateBlockField = (blockId, fieldKey, value) => {
        const instance = blockInstances.find(b => b.id === blockId)
        if (instance) {
            instance.updateField(fieldKey, value)
        }
    }

    const getBlockById = (blockId) => {
        return blockInstances.find(b => b.id === blockId)
    }

    const getAllBlocks = () => {
        return blockInstances
    }

    return {
        addBlock,
        updateBlockField,
        getBlockById,
        getAllBlocks
    }
}
