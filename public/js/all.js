var userModel = (function(){
    //private
    var users = [
        {
            id: 0,
            name: 'tencho'
        },
        {
            id: 1,
            name: 'nobisuke'
        },
        {
            id: 2,
            name: 'inaba'
        }
    ];
    function add(name) {
        var user = {
            id: users.length,
            name: name
        }
        userModel.users.push(user);
    }
    function getList() {
        return users;
    }
    function getUserById(id) {
        var user = users.filter(function(user){
            return user.id === id;
        })
        return user[0];
    }

    return {
        add: add,
        getList: getList,
        getUserById: getUserById
    }

})();