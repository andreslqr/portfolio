import { Livewire, Alpine } from '../../../vendor/livewire/livewire/dist/livewire.esm'
import Theme from './plugins/theme'
import Drawer from './plugins/daisyui/drawer'
import Swap from './plugins/daisyui/swap'
 
Alpine.plugin(Theme)
Alpine.plugin(Drawer)
Alpine.plugin(Swap)

Livewire.start()