<?php

use Illuminate\Database\Seeder;

class RecruitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datum = [
            [
                'title' =>'密码学算法与应用工程师',
                'location' =>'北京',
                'num' =>'1',
                'experience' =>'1',
                'degree' =>'无',
                'nature' =>'全职',
                'salary' =>'面议',
                'duty' =>'
                    1、 负责公司身份认证产品的技术研究和开发工作;
                    2、 负责密码学算法的研究和应用。
                ',
                'requirement' =>'
                    1、 本科以上学历 ;
                    2、 精通 C/C++ 吾言;
                    3、 熟悉 PKI 体系 , 熟悉常用的密码学算法的墓本原理 : 如 ECC、 RSA、 AES 等 ;
                    4、 熟悉 PKCS 标准 , 熟悉 CSP 接口 ;
                    5、 对密码学算法的原理和应用感兴趣 , 关注业界最新动态;
                    6、 熟悉 Linux、 Mac 系统相关开发工作者优先;
                    7、 有自我驱动力, 有强烈的责任心 . 良好的沟通能力和团队台作能力.
                ',
            ],
            [
                'title' =>'高级测试工程师',
                'location' =>'北京',
                'num' =>'1',
                'experience' =>'1',
                'degree' =>'无',
                'nature' =>'全职',
                'salary' =>'面议',
                'duty' =>'
                    1、搭建、维护测试框架，提高测试效率；
                    2、设计测试用例，编写测试代码；
                    3、需要较好的开发能力，能早期介入项目，能阅读项目代码；
                    4、负责 WEB 高性能服务的测试以及周边客户端工具的测试。
                ',
                'requirement' =>'
                    1、对测试工作有兴趣，有志于在此方向上深入发展；
                    2、精通 Java、C++/C 中任何一门编程语言，熟悉一门脚本语言；
                    3、熟悉目前流行的 WEB 开发框架；
                    4、有测试框架搭建的经验；
                    5、有开发测试工具的经验；
                    6、有高性能、高并发网络服务测试经验优先；
                    7、有大数据服务测试经验优先；
                    8、有自我驱动力，有强烈的责任心，良好的沟通能力和团队合作能力。     7、 有自我驱动力, 有强烈的责任心 . 良好的沟通能力和团队台作能力.
                ',
            ],
            [
                'title' =>'开发运维工程师',
                'location' =>'北京',
                'num' =>'1',
                'experience' =>'1',
                'degree' =>'无',
                'nature' =>'全职',
                'salary' =>'面议',
                'duty' =>'
                    云授权平台巨量数据存储的方案设计、 实现和优化。
                ',
                'requirement' =>'
                    1、 本科及以上学历 . 二年以上工作经验 ;
                    2、 精通 MySQL 数据库的使用、 优化以及内部运行机制 ;
                    3、 精通 MySQL 高可用万案、 集群等相关技术;
                    4、 熟悉高速缓存技术 , 熟悉-种以上内存数据库  , 如 Redis 等;
                    5、 熟练掌握两种以上开发语言 , 包括 Perl、 Python、 Java等;
                    6、 熟练使用 She‖ 脚本;
                    7、 有自我驱动力 , 有强烈的责任心 , 良好的沟通能力和团队台作能力。     7、 有自我驱动力, 有强烈的责任心 . 良好的沟通能力和团队台作能力.
                ',
            ],
            [
                'title' =>'销售代表',
                'location' =>'北京',
                'num' =>'1',
                'experience' =>'1',
                'degree' =>'无',
                'nature' =>'全职',
                'salary' =>'面议',
                'duty' =>'
                    1、为所辖区内与客户建立良好的关系；
                    2、重点针对客户的既有业务维系与新需求的开发；
                    3、完成相关的销售任务；
                    4、协助部门处理销售类其他事物。
                ',
                'requirement' =>'
                    1、大专以上学历；
                    2、至少1年的相关行业销售类工作经验或有过工业品销售经验，具有一定的销售沟通交    流能力；
                    3、熟练使用办公类软件，有一定的计算机基础；
                    4、普通话良好、工作认真积极主动、责任心与团队意识强；
                    5、市场营销相关专业优先。
                    
                    职业规划：销售代表—客户经理—大客户经理
                 ',
            ],
            [
                'title' =>'Java开发工程师',
                'location' =>'北京',
                'num' =>'1',
                'experience' =>'1',
                'degree' =>'无',
                'nature' =>'全职',
                'salary' =>'面议',
                'duty' =>'
                    1、基于Java相关技术的平台产品开发
                    2、负责产品部分模块的设计、开发、测试、维护工作，确保工作进度和质量
                    3、负责撰写所属模块的相关文档
                    4、维护和升级现有软件产品和系统
                ',
                'requirement' =>'
                    1、计算机相关专业本科及以上学历，两年以上相关工作经验
                    2、扎实的 Java 技术功底，在多线程、高并发程序开发方面有深厚的经验
                    3、熟悉 Java 设计模式，熟悉一种或多种流行开源框架 Struts2、Spring、Hibernate 等
                    4、熟练使用 MySQL、Oracle 等其中一种数据库系统，对数据库有较强的设计能力
                    5、熟练使用常用 NoSQL 数据库，如 Redis 等
                    6、熟悉 Tomcat、Nginx 等服务器环境的部署和调优
                    7、有分布式计算、数据挖掘、海量数据处理经验者优先
                    8、熟悉前端开发技术优先
                    9、热爱技术，对技术有不懈的追求，喜欢研究开源代码
                    10、能够自我驱动，具有团队合作精神和良好的沟通能力，有分享精神
                 ',
            ],
            [
                'title' =>'解决方案工程师',
                'location' =>'北京',
                'num' =>'1',
                'experience' =>'1',
                'degree' =>'无',
                'nature' =>'全职',
                'salary' =>'面议',
                'duty' =>'
                     1、 对产品的库和工具进行调试修改 ;
                    2、 解决产品的疑难问题 ;
                    3、 了解需求编写需求说明书;
                    4、 开发完整的加密方案;
                    5、 协助培训其他员工。
                ',
                'requirement' =>'
                    1、 熟悉Windows linux底层开发;
                    2、 熟练掌握 C++ delphi java php C#  等语言中的一种或多种 ;
                    3、 对Windows 和 Linux 系统驱动开发有所了解 ;
                    4、 对技术感兴趣  主动学习新技术.

                 ',
            ],
            [
                'title' =>'应用开发工程师',
                'location' =>'北京',
                'num' =>'1',
                'experience' =>'1',
                'degree' =>'无',
                'nature' =>'全职',
                'salary' =>'面议',
                'duty' =>'
                    我们做什么
                    1、 与客户沟通了解并深挖客户需求 ,  解决客户疑难问题 ;
                    2、 开发完整的加密方案;
                    3、 开发完善全面的办公OA系统 ;
                    4、 承担公司内部培训工作。
                    如果你有一年以上工作经验 , 有至少一个完整的中大型java顶目经验 , 熟练掌握前后台相关技术 java,mysql,ssh,html,css+div,js,json,jquery,ajax等 , 欢迎加入我们。
                    我们将提供
                    1 、 开放轻松的工作环境 ;
                    2 、 自由的学习发展空间 ;
                    3 、 多样性的晋升途径。
                ',
                'requirement' =>'',
            ],
            [
                'title' =>'前端开发工程师',
                'location' =>'北京',
                'num' =>'1',
                'experience' =>'1',
                'degree' =>'无',
                'nature' =>'全职',
                'salary' =>'面议',
                'duty' =>'
                    负责开发者中心的网站开发和改进 , 井承担一定的设计工作。
                ',
                'requirement' =>'
                    1、 精通 JavaScript、 CSS、 HTML , 至少理解-种框架 ( 如JQuery、 Angu|arJS、 React 等) ;
                    2、 熟悉 Linux 系统的开发环境 , 井能熟练使用常用命令行工具和开发工具 ;
                    3、 基础知识扎实 , 熟悉常用的数据结构和算法 ;
                    4、 了解后端开发技术着优先 ;
                    5、 热爱技术 , 善于钻研;
                    6、 良好的团队台作精神 , 善于沟通和表达。
                ',
            ],
            [
                'title' =>'C++ 开发工程师',
                'location' =>'北京',
                'num' =>'1',
                'experience' =>'1',
                'degree' =>'无',
                'nature' =>'全职',
                'salary' =>'面议',
                'duty' =>'
                    1、加密锁开发工具包的开发与维护
                    2、跨平台API的开发和维护
                    3、解决客户疑难问题
                ',
                'requirement' =>'
                    1、精通 C 或 C++语言；
                    2、精通 Windows 下WIN32 API编程，有GUI开发经验，熟悉Linux等开源系统；
                    3、学习能力强，勇于接受新领域挑战；
                    4、有责任感和主动性，能独立完成所负责模块的设计与开发工作；
                    5、良好的团队合作和沟通能力。
                ',
            ],

        ];
        foreach ($datum as $data) {
            $model = new \App\Models\Recruit();
            $model->title = $data['title'];
            $model->location = $data['location'];
            $model->num = $data['num'];
            $model->experience = $data['experience'];
            $model->degree = $data['degree'];
            $model->nature = $data['nature'];
            $model->salary = $data['salary'];
            $model->duty = $data['duty'];
            $model->requirement = $data['requirement'];
            $model->save();
        }
    }
}
