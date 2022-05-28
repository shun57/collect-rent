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
    className: 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm',
    autoComplete: true,
    required: false
  }
};

// More on component templates: https://storybook.js.org/docs/react/writing-stories/introduction#using-args
const Template = (args) => <Input {...args} />;

export const Default = Template.bind({});
