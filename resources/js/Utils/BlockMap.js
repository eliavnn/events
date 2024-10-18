import UploadInput from "@/Components/FormFields/UploadInput.vue";
import SmallTextInput from "@/Components/FormFields/SmallTextInput.vue";
import InputReplicator from "@/Components/FormFields/InputReplicator.vue";

export default new Map([
    ['text', SmallTextInput],
    ['image', UploadInput],
    ['replicator', InputReplicator],
])
