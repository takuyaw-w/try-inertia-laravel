const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"app":{"uri":"\/","methods":["GET","HEAD"]},"todo-list.index":{"uri":"todo-list","methods":["GET","HEAD"]},"todo-list.create":{"uri":"todo-list\/create","methods":["POST"]},"todo-list.delete":{"uri":"todo-list\/delete\/{id}","methods":["DELETE"]},"todo-list.edit":{"uri":"todo-list\/edit\/{id}","methods":["GET","HEAD"]},"todo-list.update":{"uri":"todo-list\/update\/{id}","methods":["PUT"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
