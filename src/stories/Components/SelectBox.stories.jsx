import React from 'react';
import SelectBox from '../../resources/js/Components/SelectBox';

// More on default export: https://storybook.js.org/docs/react/writing-stories/introduction#default-export
export default {
  title: 'Component/SelectBox',
  component: SelectBox,
  args: {
    options: [1, 3, 7]
  }
};

// More on component templates: https://storybook.js.org/docs/react/writing-stories/introduction#using-args
const Template = (args) => <SelectBox {...args} />;

export const Default = Template.bind({});

