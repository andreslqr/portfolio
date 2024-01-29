import { Livewire, Alpine } from '../../../vendor/livewire/livewire/dist/livewire.esm'
import Highlight from './plugins/highlight'
import Theme from './plugins/theme'
import Scroller from './plugins/scroller'
import Drawer from './plugins/daisyui/drawer'
import Dropdown from './plugins/daisyui/dropdown'
import Swap from './plugins/daisyui/swap'
import Copy from './plugins/copy'
import Timer from './plugins/timer'
import Contact from './plugins/contact'

import.meta.glob([
    '../images/**',
]);
 
Alpine.plugin(Highlight)
Alpine.plugin(Theme)
Alpine.plugin(Scroller)
Alpine.plugin(Drawer)
Alpine.plugin(Dropdown)
Alpine.plugin(Swap)
Alpine.plugin(Copy)
Alpine.plugin(Timer)
Alpine.plugin(Contact)

Livewire.start()