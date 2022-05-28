import React from 'react';
import Input from '../../resources/js/Components/Input';

// More on default export: https://storybook.js.org/docs/react/writing-stories/introduction#default-export
export default {
  title: 'Component/Input',
  component: Input,
  args: {
    type: 'text',
    name: 'text',
    value: 'text',
    required: false
  }
};

// More on component templates: https://storybook.js.org/docs/react/writing-stories/introduction#using-args
const Template = (args) => <Input {...args} />;

export const Default = Template.bind({});
