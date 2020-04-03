package com.soso.sosospider.controller;

import com.soso.sosospider.service.ZookeeperTask;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import javax.servlet.http.HttpServletRequest;

/**
 * @Author: Oliver
 * @Desc: desc
 * @Date: cretead in 2020/4/3 14:17
 * @Last Modified: by
 * @return value
 */
@RestController
public class TestController {

    @Autowired
    private ZookeeperTask zookeeperTask;

    @RequestMapping("/test")
    public String test(){
        return "111";
    }

    /**
     * @Author: Oliver
     * @Desc: 投递task任务，每次投递五个并发线程
     * @Date: cretead in 2020/4/3 17:09
     * @Last Modified: by
     * @return value
     */
    @RequestMapping("/task")
    public String task(HttpServletRequest request){
        String product = request.getParameter("product");
        System.out.println(product);
        for (int i=0;i<5;i++ ) {
            zookeeperTask.task(product);
        }
        return "success";
    }
}
