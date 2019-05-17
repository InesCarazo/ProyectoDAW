var service_id = 'my_mandrill';
var template_id = 'feedback';
var template_params = {
    name: 'John',
    reply_email: 'john@doe.com',
    message: 'This is awesome!'
};

emailjs.send(service_id, template_id, template_params);