import { describe, it, should } from "vitest";
import { mount } from "@vue/test-utils";
import Index from '../../Pages/Curriculum/Index.vue';

describe('Curriculum Index Tests!', () => {
    it('should render', () => {
        const wrapper = mount(Index);

        expect(wrapper).toBeTruthy();
    })
});

