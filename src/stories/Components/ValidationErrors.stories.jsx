import React from 'react';
import ValidationErrors from '../../resources/js/Components/ValidationErrors';

// More on default export: https://storybook.js.org/docs/react/writing-stories/introduction#default-export
export default {
  title: 'Component/ValidationErrors',
  component: ValidationErrors,
  args: {
    errors: {
      error1: 'error1',
      error2: 'error2'
    },
  }
};

// More on component templates: https://storybook.js.org/docs/react/writing-stories/introduction#using-args
const Template = (args) => <ValidationErrors {...args} />;

export const Default = Template.bind({});
