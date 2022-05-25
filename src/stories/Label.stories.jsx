import React from 'react';
import Label from '../resources/js/Components/Label';

// More on default export: https://storybook.js.org/docs/react/writing-stories/introduction#default-export
export default {
  title: 'Component/Label',
  component: Label,
  args: {
    forInput: 'Lavel',
    value: 'Lavel',
    className: 'block font-medium text-sm text-gray-700'
  }
};

// More on component templates: https://storybook.js.org/docs/react/writing-stories/introduction#using-args
const Template = (args) => <Label {...args} />;

export const Default = Template.bind({});
